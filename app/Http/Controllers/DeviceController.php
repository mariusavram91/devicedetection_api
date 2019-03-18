<?php

namespace App\Http\Controllers;

use App\Device;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DeviceDetector\DeviceDetector;
use DeviceDetector\Parser\Device\DeviceParserAbstract;

DeviceParserAbstract::setVersionTruncation(
    DeviceParserAbstract::VERSION_TRUNCATION_NONE
);

class DeviceController extends Controller
{
    protected $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    /**
     * Retrieve the type and OS for the given USER AGENT value.
     *
     * @return Response
     */
    public function index()
    {
        $userAgent = $this->getUserAgent();

        $dd = new DeviceDetector($userAgent);
        $dd->parse();

        $device = new Device;
        $device->type = $dd->getDeviceName();
        $device->os = $dd->getOS()['name'];

        return response()->json($device);
    }

    /**
     * Retrieve HTTP_USER_AGENT request header.
     *
     * @return User-Agent string
     */
    protected function getUserAgent()
    {
        return $this->request->header('User-Agent');
    }
}
