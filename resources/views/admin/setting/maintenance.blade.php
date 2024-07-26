@extends('admin_layout.master')

@section('content')
<div class="card card-bordered h-100">
    <div class="card-inner">
        <div class="nk-block nk-block-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h4 class="title nk-block-title">Maintenance Mode Setting</h4>
                    <div class="nk-block-des">
                        <p>You can update your site maintenance setting here.</p>
                    </div>
                </div>
            </div>
            <div class="card card-bordered">
                <div class="card-inner">
                    <div class="card-head">
                        <h5 class="card-title">Website Setting</h5>
                    </div>
                    <form action="{{ route('admin.maintenance.update') }}" method="POST">
                        @csrf
                        <div class="row g-3 align-center">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="form-label" for="site-off">Maintenance Mode</label>
                                    <span class="form-note">Enable to make website offline.</span>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="status" id="site-off" {{ isset($maintenanceStatus) && $maintenanceStatus->status == 'on' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="site-off" id="site-off-label">{{ isset($maintenanceStatus) && $maintenanceStatus->status == 'on' ? 'Offline' : 'Online' }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 align-center mt-3">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="form-label" for="ip-addresses">Allowed IP Addresses</label>
                                    <span class="form-note">Add IP addresses that are allowed during maintenance mode.</span>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group" id="ip-container">
                                    @if(isset($allowedIps) && $allowedIps->isNotEmpty())
                                        @foreach($allowedIps as $ip)
                                            <div class="input-group mb-2">
                                                <input type="text" autocomplete="off" name="ip_addresses[]" class="form-control" value="{{ old('ip_addresses.'.$loop->index, $ip->ip_address) }}">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-danger remove-ip">Delete</button>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-info" id="add-ip">Add IP</button>
                                    <span>
                                        <!-- Copy your IP Address:  -->
                                        <!-- <span title="copy your ip" id="copy-ip" data-ip="{{ request()->ip() ?? '' }}" style="cursor: pointer;">
                                            <em class="icon ni ni-copy"></em> {{ request()->ip() ?? '' }}
                                        </span> -->
                                        <button type="button" class="btn btn-warning" data-ip="{{ request()->ip() ?? '' }}" title="copy your ip" id="copy-ip">
                                            copy your ip <em class="icon ni ni-copy"></em>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 align-center mt-3">
                            <div class="col-lg-12">
                                <button type="submit" class="btn-lg btn btn-dark">Update Maintenance Setting</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- card -->
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var siteOffCheckbox = $('#site-off');
        var siteOffLabel = $('#site-off-label');
        var addIpButton = $('#add-ip');
        var ipContainer = $('#ip-container');

        if (siteOffCheckbox.length) {
            siteOffCheckbox.on('change', function() {
                var label = this.checked ? 'Offline' : 'Online';
                siteOffLabel.text(label);
            });
        }

        if (addIpButton.length) {
            addIpButton.on('click', function() {
                var newInputGroup = $('<div>', { class: 'input-group mb-2' }).html(`
                    <input type="text" autocomplete="off" name="ip_addresses[]" class="form-control">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-danger remove-ip">Delete</button>
                    </div>
                `);
                ipContainer.append(newInputGroup);
            });
        }

        if (ipContainer.length) {
            ipContainer.on('click', '.remove-ip', function() {
                $(this).closest('.input-group').remove();
            });
        }

        // Handle IP address copy
        $('#copy-ip').on('click', function() {
            var ip = $(this).data('ip');
            var tempInput = $('<input>').val(ip).appendTo('body').select();
            document.execCommand('copy');
            tempInput.remove();
           
            toastr.clear();
            NioApp.Toast('IP address copied to clipboard!', 'info', {
                position: 'top-right'
            });
        });
    });
</script>
@endsection
