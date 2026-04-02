@extends('adminlte::page')

@section('title', 'Social Media Settings')

@section('content_header')
    <h1>Social Media Links</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card card-dark">
                <div class="card-header bg-dark">
                    <h3 class="card-title">Manage Social Accounts</h3>
                </div>
                <form action="{{ route('admin.social.update') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 pb-4">
                                <div class="form-group mb-4">
                                    <label for="facebook_url">
                                        <i class="fab fa-facebook-square text-primary mr-2"></i> Facebook URL
                                    </label>
                                    <input type="url" name="facebook_url" id="facebook_url" class="form-control" value="{{ App\Models\Setting::get('facebook_url') }}" placeholder="https://facebook.com/yourpage">
                                </div>
                            </div>
                            <div class="col-md-6 pb-4">
                                <div class="form-group mb-4">
                                    <label for="twitter_url">
                                        <i class="fab fa-twitter-square text-info mr-2"></i> Twitter URL
                                    </label>
                                    <input type="url" name="twitter_url" id="twitter_url" class="form-control" value="{{ App\Models\Setting::get('twitter_url') }}" placeholder="https://twitter.com/yourhandle">
                                </div>
                            </div>
                            <div class="col-md-6 pb-4">
                                <div class="form-group mb-4">
                                    <label for="instagram_url">
                                        <i class="fab fa-instagram-square text-danger mr-2"></i> Instagram URL
                                    </label>
                                    <input type="url" name="instagram_url" id="instagram_url" class="form-control" value="{{ App\Models\Setting::get('instagram_url') }}" placeholder="https://instagram.com/yourprofile">
                                </div>
                            </div>
                            <div class="col-md-6 pb-4">
                                <div class="form-group mb-4">
                                    <label for="linkedin_url">
                                        <i class="fab fa-linkedin text-primary mr-2"></i> LinkedIn URL
                                    </label>
                                    <input type="url" name="linkedin_url" id="linkedin_url" class="form-control" value="{{ App\Models\Setting::get('linkedin_url') }}" placeholder="https://linkedin.com/company/yourcompany">
                                </div>
                            </div>
                            <div class="col-md-6 pb-4">
                                <div class="form-group mb-4">
                                    <label for="youtube_url">
                                        <i class="fab fa-youtube text-danger mr-2"></i> YouTube URL
                                    </label>
                                    <input type="url" name="youtube_url" id="youtube_url" class="form-control" value="{{ App\Models\Setting::get('youtube_url') }}" placeholder="https://youtube.com/yourchannel">
                                </div>
                            </div>
                            <div class="col-md-6 pb-4">
                                <div class="form-group mb-4">
                                    <label for="whatsapp_url">
                                        <i class="fab fa-whatsapp text-success mr-2"></i> WhatsApp URL (wa.me link)
                                    </label>
                                    <input type="url" name="whatsapp_url" id="whatsapp_url" class="form-control" value="{{ App\Models\Setting::get('whatsapp_url') }}" placeholder="https://wa.me/8801700000000">
                                </div>
                            </div>
                            <div class="col-md-6 pb-4">
                                <div class="form-group mb-4">
                                    <label for="messenger_url">
                                        <i class="fab fa-facebook-messenger text-primary mr-2"></i> Messenger URL (m.me link)
                                    </label>
                                    <input type="url" name="messenger_url" id="messenger_url" class="form-control" value="{{ App\Models\Setting::get('messenger_url') }}" placeholder="https://m.me/yourpage">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-dark px-4">Update Social Media</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
