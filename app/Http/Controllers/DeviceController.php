<?php

namespace App\Http\Controllers;

use App\Device;
use App\Http\Controllers\Controller;

use DeviceDetector\DeviceDetector;
use DeviceDetector\Parser\Device\DeviceParserAbstract;

DeviceParserAbstract::setVersionTruncation(
    DeviceParserAbstract::VERSION_TRUNCATION_NONE
);

class DeviceController extends Controller
{
    /**
     * Retrieve the type and OS for the given USER AGENT value.
     *
     * @return Response
     */
    public function index()
    {
        $userAgent = $_SERVER['HTTP_USER_AGENT'];

        $dd = new DeviceDetector($userAgent);
        $dd->parse();

        $Device = new Device;
        $Device->type = $dd->getDeviceName();
        $Device->os = $dd->getOS()['name'];

        return response()->json($Device);
    }
}
