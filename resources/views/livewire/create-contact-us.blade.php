<div class="col-lg-6">
    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {!! session()->get('success') !!}
    </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {!! session()->get('error') !!}
        </div>
    @endif
    <div class="contact-form">
        <form wire:submit.prevent="submit">
            @csrf
            <div class="row">
                <div class="col-lg-12 col-md-6">
                    <div class="form-group">
                        <input type="text" wire:model="name" class="form-control" placeholder="Name">
                        @error('name') <span class="with-errors">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-lg-12 col-md-6">
                    <div class="form-group">
                        <input type="email" wire:model="email" class="form-control" placeholder="Email">
                        @error('email') <span class="with-errors">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-lg-12 col-md-6">
                    <div class="form-group">
                        <input type="text" wire:model="phone" class="form-control" placeholder="Phone">
                        @error('phone') <span class="with-errors">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-lg-12 col-md-6">
                    <div class="form-group">
                        <input type="text" wire:model="subject" class="form-control" placeholder="Subject">
                        @error('subject') <span class="with-errors">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <textarea  type="text" class="form-control" wire:model="message" cols="30" rows="5"
                            placeholder="Message"></textarea>
                        @error('message') <span class="with-errors">{{ $message }}</span> @enderror
                    </div>
                </div>
                {{--<div class="col-lg-12">
                    <div class="form-group">
                        <div class="form-check">
                            <input name="gridCheck" value="I agree to the terms and privacy policy."
                                class="form-check-input" type="checkbox" id="gridCheck" required>
                            <label class="form-check-label" for="gridCheck">
                                Accept <a href="terms-of-service.html">Terms Of Services</a> And<a
                                    href="privacy-policy.html">privacy policy</a>
                            </label>
                            <div class="help-block with-errors gridCheck-error"></div>
                        </div>
                    </div>
                </div>--}}
                <div class="col-lg-12 col-md-12">
                    <button type="submit" class="default-btn">
                        Submit Now
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
