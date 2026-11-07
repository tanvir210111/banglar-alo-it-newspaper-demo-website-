@extends('layouts.admin')

@section('content')
<div class="content-area">
    <div class="mr-breadcrumb">
        <h4 class="heading"><i class="fas fa-shield-alt mr-2"></i>{{ __('System License & Provider Details') }}</h4>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="add-product-content shadow-lg bg-white rounded-xl p-5 border-0">
                
                {{-- ১. লাইসেন্স স্ট্যাটাস কার্ড --}}
                <div class="text-center mb-5">
                    @if(isset($licenseData['status']) && $licenseData['status'] == 'valid')
                        <div class="mb-3">
                            <i class="fas fa-check-circle text-success" style="font-size: 70px;"></i>
                        </div>
                        <h2 class="font-weight-bold text-dark">License Activated</h2>
                        <span class="badge badge-success px-4 py-2">{{ __('Authorized Site') }}</span>
                    @else
                        <div class="mb-3">
                            <i class="fas fa-times-circle text-danger" style="font-size: 70px;"></i>
                        </div>
                        <h2 class="font-weight-bold text-danger">License Invalid</h2>
                        <span class="badge badge-danger px-4 py-2">{{ __('Unauthorized Domain') }}</span>
                    @endif
                </div>

                <div class="row mt-4">
                    {{-- ২. ডোমেইন ও লাইসেন্স ডিটেইলস (বাম পাশ) --}}
                    <div class="col-md-6 mb-4">
                        <div class="card h-100 border-0 bg-light rounded-lg shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold text-primary mb-4">
                                    <i class="fas fa-globe mr-2"></i>Domain & License
                                </h5>
                                
                                <div class="mb-3 border-bottom pb-2">
                                    <small class="text-muted d-block">Your Current Domain</small>
                                    <span class="font-weight-bold text-dark">{{ request()->getHost() }}</span>
                                </div>

                                <div class="mb-3 border-bottom pb-2">
                                    <small class="text-muted d-block">Authorized Domain (From Server)</small>
                                    <span class="font-weight-bold text-info">
                                        {{-- মাদার সাইট থেকে ডোমেইন নাম আসলে তা দেখাবে --}}
                                        {{ isset($licenseData['domain_name']) ? $licenseData['domain_name'] : 'Verification Pending' }}
                                    </span>
                                </div>

                                <div class="mb-3 border-bottom pb-2">
                                    <small class="text-muted d-block">License Key</small>
                                    <code class="text-danger font-weight-bold">{{ env('LICENSE_KEY') }}</code>
                                </div>

                                {{-- লাইসেন্স মেয়াদ দেখানোর অংশ --}}
                                <div class="mb-0">
                                    <small class="text-muted d-block">License Status / Expiry</small>
                                    @if(isset($licenseData['expiry_date']))
                                        <span class="font-weight-bold {{ \Carbon\Carbon::parse($licenseData['expiry_date'])->isPast() ? 'text-danger' : 'text-success' }}">
                                            <i class="fas fa-calendar-alt mr-1"></i>
                                            Valid Until: {{ \Carbon\Carbon::parse($licenseData['expiry_date'])->format('d M, Y') }}
                                        </span>
                                    @else
                                        <span class="font-weight-bold text-warning">
                                            <i class="fas fa-hourglass-half mr-1"></i> Expiry Data Not Found
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ৩. লাইসেন্স প্রোভাইডার ও কন্টাক্ট (ডান পাশ) --}}
                    <div class="col-md-6 mb-4">
                        <div class="card h-100 border-0 bg-light rounded-lg shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold text-primary mb-4">
                                    <i class="fas fa-headset mr-2"></i>Provider Support
                                </h5>
                                
                                <div class="mb-3">
                                    <label class="font-weight-bold mb-1">Company:</label>
                                    <p class="text-dark mb-0 font-weight-bold">Creative Design BD</p>
                                </div>

                                <div class="mb-3">
                                    <label class="font-weight-bold mb-1">Email Support:</label>
                                    <p class="text-dark mb-0"><i class="fas fa-envelope mr-1 text-primary"></i> info@creativedesign.com.bd</p>
                                </div>

                                <div class="mb-3">
                                    <label class="font-weight-bold mb-1">Official Website:</label>
                                    <p class="mb-0">
                                        <a href="https://creativedesign.com.bd" target="_blank" class="text-primary font-weight-bold">
                                            www.creativedesign.com.bd <i class="fas fa-external-link-alt small ml-1"></i>
                                        </a>
                                    </p>
                                </div>

                                <div class="mt-4">
                                    <a href="https://creativedesign.com.bd/contact" target="_blank" class="btn btn-primary btn-block rounded-pill py-2">
                                        <i class="fab fa-whatsapp mr-1"></i> Contact Support
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4 text-muted small">
                    <i class="fas fa-lock mr-1"></i> Secure License Verification by Creative Design System.
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .rounded-xl { border-radius: 20px; }
    .rounded-lg { border-radius: 15px; }
    .bg-light { background-color: #f8f9fa !important; }
    code { background: #fee2e2; padding: 4px 8px; border-radius: 5px; font-size: 14px; border: 1px solid #fecaca; }
    .badge { font-size: 14px; letter-spacing: 1px; font-weight: 500; }
    .btn-primary { background-color: #3b82f6; border: none; transition: 0.3s; }
    .btn-primary:hover { background-color: #2563eb; transform: translateY(-2px); box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3); }
    .card-title { font-size: 1.1rem; }
</style>
@endsection