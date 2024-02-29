<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Queue;
use App\Models\Service;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class QueueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //sleep(3);
        $queueCount = Queue::whereDate('created_at', Carbon::today())->count();

        $queueData = [
            'services_id' => $request->type == 'service' ? $request->id : null,
            'categories_id' => $request->type != 'service' ? $request->id : null,
        ];

        $queue = Queue::create($queueData);

        if ($request->type == 'service') {
            $service = Service::with('letter')->where('id', $request->id)->first();
        } else {
            $service = Category::with('service.letter')->where('id', $request->id)->first();
        }

        return response()->json([
            'date' => $queue->created_at->format('d/m/Y H:i:s'),
            'waiting' => $queueCount,
            'service' => $service
        ]);
    }

    public function report()
    {
        //dd(12);
        // $pdf = app('dompdf.wrapper');
        // $pdf->getDomPDF()->set_option("enable_php", true);
        // $pdf->loadView('report')->setPaper('A4', 'landscape');
        // return $pdf->stream('ticket.pdf');
        $pdf = Pdf::loadView('reports.ticket')->setPaper('A4', 'landscape');
        $pdf->setOption('javascript-delay', 3000);
        return $pdf->download('invoice.pdf');
    }

    /**
     * Display the specified resource.
     */
    public function show(Queue $queue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Queue $queue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Queue $queue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Queue $queue)
    {
        //
    }
}
