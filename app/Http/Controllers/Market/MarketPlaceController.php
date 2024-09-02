<?php

namespace App\Http\Controllers\Market;

use App\Helpers\Classes\Helper;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ExtensionRepositoryInterface;
use Illuminate\Http\Request;

class MarketPlaceController extends Controller
{
    public function __construct(
        public ExtensionRepositoryInterface $extensionRepository
    ) {}

    public function index()
    {
        $items = $this->extensionRepository->extensions();

        $subscription = $this->extensionRepository->subscription()->json();

        return view('panel.admin.marketplace.index', compact('items', 'subscription'));
    }

    public function extension($slug)
    {
        $item = $this->extensionRepository->find($slug);

        $marketSubscription = $this->extensionRepository->subscription()->json();

        if (! $item) {
            return to_route('dashboard.admin.marketplace.index')->with('error', 'Extension not found.');
        }

        return view('panel.admin.marketplace.show', compact('item', 'marketSubscription'));
    }

    public function licensedExtension()
    {
        $items = $this->extensionRepository->licensed(
            $this->extensionRepository->extensions()
        );

        return view('panel.admin.marketplace.licensed', compact('items'));
    }

    public function buyExtension($slug)
    {
        $item = $this->extensionRepository->find($slug);

        if (! $item) {
            return to_route('dashboard.admin.marketplace.index')->with('error', 'Extension not found.');
        }

        $response = $this->extensionRepository->request('get', '', [], $item['routes']['paymentJson']);

        if ($response->ok()) {
            $data = $response->json('data');

            return view('panel.admin.marketplace.payment', compact('item', 'data'));
        }

        if (! $item) {
            return to_route('dashboard.admin.marketplace.index')->with('error', 'Extension not found.');
        }
    }

    public function extensionActivate(Request $request, string $token)
    {

        cache()->forget('check_license_domain_' . $request->getHost());

        $data = Helper::decodePaymentToken($token);

        $item = $this->extensionRepository->find($data['slug']);

        return view('panel.admin.marketplace.activate', [
            'item'    => $item,
            'token'   => $token,
            'success' => $request->get('redirect_status') == 'succeeded',
        ]);
    }
}
