<?php

namespace App\Http\Controllers;
use App\Http\Requests\TicketFormRequest;


use App\Ticket;


class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ticket=ticket::all();
        return view('ticket.index')->with('tickets', $ticket);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ticket.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketFormRequest $request)
    {
        
    $slug = uniqid();
    $ticket = new Ticket(array(
        'title' => $request->get('title'),
        'content' => $request->get('content'),
        'slug' => $slug
    ));

    $ticket->save();

    return redirect('/contact')->with('status', 'Your ticket has been created! Its unique id is: '.$slug);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();
        // dd($ticket);
        $comments=$ticket->comments()->get();
    return view('ticket.show', compact('ticket','comments'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $ticket= Ticket::whereSlug($slug)->firstOrFail();
        return view('ticket.edit',compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TicketFormRequest $request, $slug)
    {
        $ticket=Ticket::whereSlug($slug)->firstOrFail();
        $ticket->title = $request->get('title');
        $ticket->content=$request->get('content');
        if ($request->get('status') !=null) {
            $ticket->status=0;
            
        }else{
            $ticket->status=1;
        }
        $ticket->save();
        return redirect(action('TicketsController@edit',$ticket->slug))->with('status','the ticket'.$slug.'has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $ticket=Ticket::whereSlug($slug)->firstOrFail();
        $ticket->delete();
        return redirect('/tickets')->with('status','the ticket'.$slug.'has been deleted!');
    }
    
    
}
