<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-arrwo">
            <li class="breadcrumb-item"><a wire:navigate href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Settings</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3>Settings</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" wire:submit.prevent="updateData">
                        <div class="row">
                            <div class="mb-3 col-lg-6 col-12">
                                <label class="form-label">Sim Cost</label>
                                <input type="number" step="any" class="form-control @error('server_status') is-invalid @enderror" wire:model="state.sim_cost">
                                @error('sim_cost')
                                <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-6 col-12">
                                <label class="form-label">Server Status</label>
                                <select wire:model="state.server_status" class="form-control @error('server_status') is-invalid @enderror">
                                    {!! getYesNoDropdown() !!}
                                </select>
                                @error('server_status')
                                <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-12 col-12">
                                <label class="form-label">Server Online Message</label>
                                <textarea rows="5" class="form-control @error('server_online_message') is-invalid @enderror" wire:model="state.server_online_message"></textarea>
                                @error('server_online_message')
                                <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-12 col-12">
                                <label class="form-label">Server Offline Message</label>
                                <textarea rows="5" class="form-control @error('server_offline_message') is-invalid @enderror" wire:model="state.server_offline_message"></textarea>
                                @error('server_offline_message')
                                <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-6 col-12">
                                <label class="form-label">New User Discount(%)</label>
                                <input type="number" step="any" class="form-control @error('new_user_discount') is-invalid @enderror" wire:model="state.new_user_discount">
                                @error('new_user_discount')
                                <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-6 col-12">
                                <label class="form-label">Notification Status (front end message on all pages)</label>
                                <select wire:model="state.notification_status" class="form-control @error('notification_status') is-invalid @enderror">
                                    {!! getYesNoDropdown() !!}
                                </select>
                                @error('notification_status')
                                <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-12 col-12">
                                <label class="form-label">Notification Message (front end message as above)</label>
                                <textarea rows="5" class="form-control @error('notification_message') is-invalid @enderror" wire:model="state.notification_message"></textarea>
                                @error('notification_message')
                                <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-6 col-12">
                                <label class="form-label">Contact Page Website Address</label>
                                <input type="text" class="form-control @error('contact_page_website_address') is-invalid @enderror" wire:model="state.contact_page_website_address">
                                @error('contact_page_website_address')
                                <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-6 col-12">
                                <label class="form-label">Contact Page Phone Number</label>
                                <input type="text" class="form-control @error('contact_page_phone_number') is-invalid @enderror" wire:model="state.contact_page_phone_number">
                                @error('contact_page_phone_number')
                                <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-6 col-12">
                                <label class="form-label">Contact Page Email</label>
                                <input type="email" class="form-control @error('contact_page_email') is-invalid @enderror" wire:model="state.contact_page_email">
                                @error('contact_page_email')
                                <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-6 col-12">
                                <label class="form-label">Contact Page Telegram(Full Link)</label>
                                <input type="text" class="form-control @error('contact_page_telegram') is-invalid @enderror" wire:model="state.contact_page_telegram">
                                @error('contact_page_telegram')
                                <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-6 col-12">
                                <label class="form-label">Contact Page Whatsapp(Full Link)</label>
                                <input type="text" class="form-control @error('contact_page_whatsapp') is-invalid @enderror" wire:model="state.contact_page_whatsapp">
                                @error('contact_page_whatsapp')
                                <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-6 col-12">
                                <label class="form-label">Contact Page Facebook(Full Link)</label>
                                <input type="text" class="form-control @error('contact_page_facebook') is-invalid @enderror" wire:model="state.contact_page_facebook">
                                @error('contact_page_facebook')
                                <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-6 col-12">
                                <label class="form-label">Contact Page Instagram(Full Link)</label>
                                <input type="text" class="form-control @error('contact_page_instagram') is-invalid @enderror" wire:model="state.contact_page_instagram">
                                @error('contact_page_instagram')
                                <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-6 col-12">
                                <label class="form-label">Crypto Api Key</label>
                                <input type="text" class="form-control @error('crypto_api') is-invalid @enderror" wire:model="state.crypto_api">
                                @error('crypto_api')
                                <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-6 col-12">
                                <label class="form-label">G-Captcha Site Key</label>
                                <input type="text" class="form-control @error('g_captcha_site_key') is-invalid @enderror" wire:model="state.g_captcha_site_key">
                                @error('g_captcha_site_key')
                                <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-6 col-12">
                                <label class="form-label">G-Captcha Secret Key</label>
                                <input type="text" class="form-control @error('g_captcha_secret_key') is-invalid @enderror" wire:model="state.g_captcha_secret_key">
                                @error('g_captcha_secret_key')
                                <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-6 col-12">
                                <label class="form-label">Auto Refund</label>
                                <select wire:model="state.auto_refund" class="form-control @error('auto_refund') is-invalid @enderror">
                                    {!! getYesNoDropdown() !!}
                                </select>
                                @error('auto_refund')
                                <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
