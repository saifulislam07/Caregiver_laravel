@extends('adminlte::page')

@section('title', 'General Settings')

@section('content_header')
    <h1>General & Branding Settings</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Site Branding</h3>
                </div>
                <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="site_name">Site Name</label>
                            <input type="text" name="site_name" id="site_name" class="form-control" value="{{ App\Models\Setting::get('site_name') }}" required>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="site_logo">Color Logo (For Light Background)</label>
                                    @if(App\Models\Setting::get('site_logo'))
                                        <div class="mb-2">
                                            <img src="{{ asset(App\Models\Setting::get('site_logo')) }}" alt="Logo" style="max-height: 50px; background: #f8f9fa; padding: 5px;">
                                        </div>
                                    @endif
                                    <input type="file" name="site_logo" id="site_logo" class="form-control-file">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="site_logo_white">White Logo (For Dark Background)</label>
                                    @if(App\Models\Setting::get('site_logo_white'))
                                        <div class="mb-2">
                                            <img src="{{ asset(App\Models\Setting::get('site_logo_white')) }}" alt="White Logo" style="max-height: 50px; background: #343a40; padding: 5px;">
                                        </div>
                                    @endif
                                    <input type="file" name="site_logo_white" id="site_logo_white" class="form-control-file">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="site_favicon">Favicon</label>
                                    @if(App\Models\Setting::get('site_favicon'))
                                        <div class="mb-2">
                                            <img src="{{ asset(App\Models\Setting::get('site_favicon')) }}" alt="Favicon" style="max-height: 32px;">
                                        </div>
                                    @endif
                                    <input type="file" name="site_favicon" id="site_favicon" class="form-control-file">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-header bg-dark mt-4">
                        <h3 class="card-title">SEO Meta Settings</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="meta_title_suffix">Meta Title Suffix (Appears after page title)</label>
                            <input type="text" name="meta_title_suffix" id="meta_title_suffix" class="form-control" value="{{ App\Models\Setting::get('meta_title_suffix') }}" placeholder="- HealoraHealth | Premium Home Care">
                        </div>
                        <div class="form-group">
                            <label for="meta_description_default">Default Meta Description</label>
                            <textarea name="meta_description_default" id="meta_description_default" class="form-control" rows="3">{{ App\Models\Setting::get('meta_description_default') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="meta_keywords_default">Default Meta Keywords</label>
                            <input type="text" name="meta_keywords_default" id="meta_keywords_default" class="form-control" value="{{ App\Models\Setting::get('meta_keywords_default') }}">
                        </div>
                    </div>

                    <div class="card-header bg-secondary mt-4">
                        <h3 class="card-title">Contact Details</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="contact_email">Contact Email</label>
                            <input type="email" name="contact_email" id="contact_email" class="form-control" value="{{ App\Models\Setting::get('contact_email') }}">
                        </div>
                        <div class="form-group">
                            <label for="contact_phone">Contact Phone</label>
                            <input type="text" name="contact_phone" id="contact_phone" class="form-control" value="{{ App\Models\Setting::get('contact_phone') }}">
                        </div>
                        <div class="form-group">
                            <label for="address">Office Address</label>
                            <textarea name="address" id="address" class="form-control" rows="3">{{ App\Models\Setting::get('address') }}</textarea>
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Save Settings</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
