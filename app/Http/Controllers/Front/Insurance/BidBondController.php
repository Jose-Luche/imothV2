<?php

namespace App\Http\Controllers\Front\Insurance;

use App\Http\Controllers\Controller;
use App\Mail\Admin\AdminBidBondEmail;
use App\Mail\Admin\AdminThirdParty;
use App\Mail\User\BidBondEmail;
use App\Models\BidBond;
use App\Models\BidBondApplication;
use App\Models\Comprehensive;
use App\Models\MotorApplication;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BidBondController extends Controller
{
    public function index()
    {
        return view('front.bond.index');
    }

    public function submitBondDetails(Request $request)
    {
        $validator = $request->validate([
            'companyName' => 'required|max:255',
            'tenderNumber' => 'required',
            'physicalAddress' => 'required',
            'tenderName' => 'required',
            'bondValue' => 'required',
            'period' => 'required|integer|gt:0',
            'commencementDate' => 'required|date',
            'description' => 'required',
            'advertisingCompany' => 'required',
            'address' => 'required',
        ]);


        $endDate = Carbon::parse($request->commencementDate)->addDays($request->period);

        $bondValue = (int) filter_var($request->input('bondValue'), FILTER_SANITIZE_NUMBER_INT);
        $contractPrice = (int) filter_var($request->input('contractPrice'), FILTER_SANITIZE_NUMBER_INT);

        $request->session()->put('companyName', $request->input('companyName'));
        $request->session()->put('tenderNumber', $request->input('tenderNumber'));
        $request->session()->put('physicalAddress', $request->input('physicalAddress'));
        $request->session()->put('endDate', $endDate);
        $request->session()->put('tenderName', $request->input('tenderName'));
        $request->session()->put('bondValue', $bondValue);
        $request->session()->put('period', $request->input('period'));
        $request->session()->put('commencementDate', $request->input('commencementDate'));
        $request->session()->put('description', $request->input('description'));
        $request->session()->put('contractPrice', $contractPrice);
        $request->session()->put('advertisingCompany', $request->input('advertisingCompany'));
        $request->session()->put('address', $request->input('address'));

        return redirect()->route('front.bond.bio');
    }

    public function userBio()
    {
        return view('front.bond.bio');
    }

    public function submitBio(Request $request)
    {
        $validatedData = $request->validate([
            'firstName' => 'required|max:255',
            'lastName' => 'required',
            'phoneNumber' => 'required|numeric|min:10',
            'email' => 'required|email'
        ]);

        $request->session()->put('firstName', $request->input('firstName'));
        $request->session()->put('lastName', $request->input('lastName'));
        $request->session()->put('phone', $request->input('phoneNumber'));
        $request->session()->put('email', $request->input('email'));

        /**Once I have the COvers, I now proceed to Store them in the Database so that i can see available Covers**/
        $create = BidBondApplication::create([
            'firstName' => Session::get('firstName'),
            'lastName' => Session::get('lastName'),
            'phone' => Session::get('phone'),
            'email' => Session::get('email'),
            'quoteId' => 0,
            'company' => Session::get('companyName'),
            'tenderNo' => Session::get('tenderNumber'),
            'bondValue' => Session::get('bondValue'),
            'physicalAddress' => Session::get('physicalAddress'),
            'tenderName' => Session::get('tenderName'),
            'contractPrice' => Session::get('contractPrice'),
            'period' => Session::get('period'),
            'commencementDate' => Session::get('commencementDate'),
            'endDate' => Session::get('endDate'),
            'description' => Session::get('description'),
            'advertisingCompany' => Session::get('advertisingCompany'),
            'address' => Session::get('address'),
            'expectedValue' => 0
        ]);
        

        return redirect()->route('front.bond.covers', $create->id);
    }

    public function covers($id)
    {
        $covers = BidBond::orderBy('rate', 'ASC')->paginate(10);
        $applicationDetails = BidBondApplication::find($id);

        /**Premium Workings**/
        $html = "";
        $coverDetails = [];
        foreach ($covers as $cover) {
            $totalPremium = 0;

            $html = '<p>Bond Value: <b style="margin-left: 20px">' . number_format($applicationDetails->bondValue) . '</b></p>';
            /**Basic Premium Part**/
            $html .= '<p>Basic Premium: ';
            if ($cover->rate < 100) {
                if (($cover->rate / 100 * $applicationDetails->bondValue ?? 0) < ($cover->minRate ?? 0)) {
                    $basicPremium = $cover->minRate;
                } else {
                    $basicPremium = $cover->rate / 100 * $applicationDetails->bondValue ?? 0;
                }
            } else {
                $basicPremium = $cover->rate;
            }
            $html .= '<span style="float: right">' . number_format($basicPremium, 2) . '</span>';

            $totalBasicPremium = $basicPremium;
            $phcf = round(0.25 / 100 * $totalBasicPremium, 2);
            $itl = round(0.2 / 100 * $totalBasicPremium, 2);
            $stampDuty = 40;
            $totalPremiumPayable = $totalBasicPremium + $phcf + $itl + $stampDuty;
            $html .= '</p>';
            $html .= '<hr>';
            $html .= '<p>Total Basic Premium: <span style="float: right">' . number_format($totalBasicPremium, 2) . '</span></p>';
            $html .= '<p>PHCF (0.25%): <span style="float: right">' . number_format($phcf, 2) . '</span></p>';
            $html .= '<p>ITL (0.2%): <span style="float: right">' . number_format($itl, 2) . '</span></p>';
            $html .= '<p>Stamp Duty: <span style="float: right">' . number_format($stampDuty, 2) . '</span></p>';
            $html .= '<hr>';
            $html .= ' <p>Total Premium Payable:  <span style="float: right"><b>' . number_format($totalPremiumPayable, 2) . '</b></span></p>';

            $coverDetails[] = [
                'cover' => $cover,
                'html' => $html,
            ];
        }

        

        if ((int)Session::get('bondValue') == null) {
            return redirect()->route('front.bond.index')
                ->with('error', 'Please fill all the required details.');
        }
        //$quotes = BidBond::orderBy('rate','DESC')->get();
        return view('front.bond.covers', [
            'html' => $html,
            'covers' => $coverDetails,
            'applicationDetails' => $applicationDetails,
        ]);
    }

    public function coverDetails($applicationId, $id)
    {
        $details = BidBond::findOrfail($id);
        $covers = BidBond::orderBy('rate', 'ASC')->paginate(10);
        $applicationDetails = BidBondApplication::findOrfail($applicationId);

        /**Computations**/
        $totalPremium = 0;
        $cover = $details;
        $html = '<p>Bond Value: <b style="margin-left: 20px">' . number_format($applicationDetails->bondValue) . '</b></p>';
        /**Basic Premium Part**/
        $html .= '<p>Basic Premium: ';
        if ($cover->rate < 100) {
            if (($cover->rate / 100 * $applicationDetails->bondvalue ?? 0) < ($cover->minRate ?? 0)) {
                $basicPremium = $cover->minRate;
            } else {
                $basicPremium = $cover->rate / 100 * $applicationDetails->bondvalue ?? 0;
            }
        } else {
            $basicPremium = $cover->rate;
        }
        $html .= '<span style="float: right">' . number_format($basicPremium, 2) . '</span>';

        $totalBasicPremium = $basicPremium;
        $phcf = round(0.25 / 100 * $totalBasicPremium, 2);
        $itl = round(0.2 / 100 * $totalBasicPremium, 2);
        $stampDuty = 40;
        $totalPremiumPayable = $totalBasicPremium + $phcf + $itl + $stampDuty;
        $html .= '</p>';
        $html .= '<hr>';
        $html .= '<p>Total Basic Premium: <span style="float: right">' . number_format($totalBasicPremium, 2) . '</span></p>';
        $html .= '<p>PHCF (0.25%): <span style="float: right">' . number_format($phcf, 2) . '</span></p>';
        $html .= '<p>ITL (0.2%): <span style="float: right">' . number_format($itl, 2) . '</span></p>';
        $html .= '<p>Stamp Duty: <span style="float: right">' . number_format($stampDuty, 2) . '</span></p>';
        $html .= '<hr>';
        $html .= ' <p>Total Premium Payable:  <span style="float: right"><b>' . number_format($totalPremiumPayable, 2) . '</b></span></p>';

        $updateApplication = $applicationDetails->update([
            'quoteId' => $details->id, 'expectedValue' => $totalPremiumPayable
        ]);
        if (!$updateApplication) {
            return back()->with('error', 'An unexpected error occurred please try again.');
        }

        Mail::to(env('ADMIN_NOTIF_MAIL'))->send(new AdminBidBondEmail($applicationDetails));

        return view('front.bond.details', [
            'total' => $totalPremiumPayable,
            'html' => $html,
            'details' => $details,
            'covers' => $covers,
            'applicationDetails' => $applicationDetails,
        ]);

        
    }

    public function submitApplication(Request $request, $id)
    {
        $applicationDetails = BidBondApplication::findOrfail($id);

        $message = "Your Bid Bond Insurance application to Insurancemaramoja was successful.We will get back to you shortly.";
        //sendSms($create->phone,$message);

        //Mail::to($applicationDetails->email)->send(new BidBondEmail($applicationDetails));
        Mail::to(env('ADMIN_NOTIF_MAIL'))->send(new AdminBidBondEmail($applicationDetails));

        $type = 'paynow';
        if ($type === 'paynow') {
            return redirect()->route('front.bond.pay', $id)->with('success', 'Request received.Pay now to complete request.');
        }

        return back()->with('success', 'Request placed successfully.We will get back to you shortly.');
    }

    public function pay($id)
    {
        $details = BidBondApplication::findOrFail($id);


        $payment = Payment::where('ref_id', $details->id)
            ->where('type', Payment::TYPE_BIDBOND)
            ->first();
        if (!$payment) {
            $payment = Payment::create([
                'ref_id' => $details->id,
                'amount' => $details->expectedValue,
                'type' => Payment::TYPE_BIDBOND,
                'phone' => Session::get('phoneNumber'),
                'paid_amount' => 0
            ]);
        }

        return view('front.bond.pay', [
            'details' => $details,
            'payment' => $payment
        ]);
    }
}
