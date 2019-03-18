<?php

use App\Http\Controllers\DeviceController;

class DeviceTest extends TestCase
{
    /**
     * A basic Api test for a Linux desktop device.
     *
     * @return void
     */
    public function testApiDetectsDeviceFromUserAgentValueIsLinuxDesktop()
    {
        $userAgent = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.92 Safari/537.36';
        $headers = [
            'HTTP_USER_AGENT' => $userAgent
        ];

        $this->get('/api/device_info', $this->transformHeadersToServerVars($headers));

        $this->assertEquals(200, $this->response->status());
        $this->seeJson([
            'type' => 'desktop',
            'os' => 'GNU/Linux',
        ]);
    }

    /**
     * A basic Api test for an Android mobile device.
     *
     * @return void
     */
    public function testApiDetectsDeviceFromUserAgentValueIsAndroidMobile()
    {
        $userAgent = 'Mozilla/5.0 (Linux; Android 6.0; 5080U Build/MRA58K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.91 Mobile Safari/537.36';
        $headers = [
            'HTTP_USER_AGENT' => $userAgent
        ];

        $this->get('/api/device_info', $this->transformHeadersToServerVars($headers));

        $this->assertEquals(200, $this->response->status());
        $this->seeJson([
            'type' => 'smartphone',
            'os' => 'Android',
        ]);
    }

    /**
     * A basic Api test for an Android tablet device.
     *
     * @return void
     */
    public function testApiDetectsDeviceFromUserAgentValueIsAndroidTablet()
    {
        $userAgent = 'Mozilla/5.0 (Linux; Android 4.4.2; QUANTUM_1010N Build/GOCLEVER) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.98 Safari/537.36';
        $headers = [
            'HTTP_USER_AGENT' => $userAgent
        ];

        $this->get('/api/device_info', $this->transformHeadersToServerVars($headers));

        $this->assertEquals(200, $this->response->status());
        $this->seeJson([
            'type' => 'tablet',
            'os' => 'Android',
        ]);
    }
}
