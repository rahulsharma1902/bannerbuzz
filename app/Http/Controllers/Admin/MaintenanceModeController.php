<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MaintenanceIps;

class MaintenanceModeController extends Controller
{
    public function index()
    {
        $maintenanceStatus = MaintenanceIps::whereNull('ip_address')->first();
        $allowedIps = MaintenanceIps::whereNotNull('ip_address')->get();

        return view('admin.setting.maintenance', compact('maintenanceStatus', 'allowedIps'));
    }


    public function update(Request $request)
    {
        // echo '<pre>';
        // print_r($request->all());
        // die();
        $status = $request->input('status') ? 'on' : 'off';

        MaintenanceIps::updateOrInsert(
            ['id' => 1],
            ['status' => $status, 'ip_address' => null, 'updated_at' => now()]
        );

        MaintenanceIps::whereNotNull('ip_address')->delete();
        if ($request->has('ip_addresses')) {
            foreach ($request->input('ip_addresses') as $ip) {
                MaintenanceIps::create([
                    'status' => 'off',
                    'ip_address' => $ip,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Maintenance mode updated successfully.');
    }

}
