@extends('layouts.app')
@section('style')
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
@endsection

@section('content')
<!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-9 col-md-offset-2">
              <div class="panel with-nav-tabs">
               <div class="panel-heading">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#receivedMessages" data-toggle="tab">Received</a></li>
                    <li><a href="#sentMessages" data-toggle="tab">Sent</a></li>
                  </ul>
                </div>
              <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="receivedMessages">
                          <div class="row">
                              <div class="col-xs-3">
                                  <strong>Sender</strong>
                              </div>
                              <div class="col-xs-3">
                                <strong>Product</strong>
                              </div>
                              <div class="col-xs-2">
                                <strong>Type</strong>
                              </div>
                              <div class="col-xs-2">
                                <strong>Amount</strong>
                              </div>
                            </div>
                            @foreach ($messagesReceived as $message)
                              @continue($message->is_aproved || $message->is_denied)
                              <div class="row">
                                <div class="col-xs-3">
                                    {{$loop->iteration}}.
                                    {{ucfirst($message->senderModel->name)}}
                                </div>
                                <div class="col-xs-3">
                                  {{$message->product->title}}
                                </div>
                                <div class="col-xs-2">
                                  @if ($message->per_hour)
                                    Per hour({{$message->product->per_hour}}$)
                                  @else
                                    Per day({{$message->product->per_day}}$)
                                  @endif
                                </div>
                                <div class="col-xs-2">
                                    {{$message->amount}}
                                </div>
                                <div class="col-xs-2">
                                  <form action="{{ route('messages.update') }}" method="post" style="float:left">
                          					 	{{ csrf_field() }}
                                      <input type="hidden" name="message_id" value="{{$message->id}}">
                                      <input type="hidden" name="type" value="approve">
                                      <button type="submit" class="btn btn-success" aria-label="Left Align" title="Approve">
                                        <span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span>
                                      </button>
                                  </form>
                                  <form action="{{ route('messages.update') }}" method="post" style="float:left">
                          					 	{{ csrf_field() }}
                                      <input type="hidden" name="message_id" value="{{$message->id}}">
                                      <input type="hidden" name="type" value="deny">
                                      <button type="submit" class="btn btn-danger" aria-label="Left Align" title="Deny">
                                        <span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span>
                                      </button>
                                  </form>
                                </div>
                              </div>
                              <hr>
                            @endforeach
                        </div>
                        <div class="tab-pane fade" id="sentMessages">
                          <div class="row">
                              <div class="col-xs-3">
                                  <strong>Product</strong>
                              </div>
                              <div class="col-xs-3">
                                <strong>Status</strong>
                              </div>
                              <div class="col-xs-2">
                                <strong>Type</strong>
                              </div>
                              <div class="col-xs-2">
                                <strong>Amount</strong>
                              </div>
                            </div>
                            @foreach ($messagesSent as $message)
                              <div class="row">
                                <div class="col-xs-3">
                                  {{$loop->iteration}}.
                                  {{$message->product->title}}
                                </div>
                                <div class="col-xs-3">
                                    @if ($message->is_aproved)
                                      <p style="text-color:green">Approved</p>
                                    @elseif($message->is_denied)
                                      <p style="text-color:red">Denied</p>
                                    @else
                                      Not responed
                                    @endif
                                </div>
                                <div class="col-xs-2">
                                  @if ($message->per_hour)
                                    Per hour({{$message->product->per_hour}}$)
                                  @else
                                    Per day({{$message->product->per_day}}$)
                                  @endif
                                </div>
                                <div class="col-xs-2">
                                    {{$message->amount}}
                                </div>
                                <div class="col-xs-2">
                                  <form action="{{ route('messages.update') }}" method="post">
                          					 	{{ csrf_field() }}
                                      <input type="hidden" name="message_id" value="{{$message->id}}">
                                      <input type="hidden" name="type" value="cancel">
                                      <button type="submit" class="btn btn-danger" aria-label="Left Align" title="Cancel">
                                        <span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span>
                                      </button>
                                  </form>
                                </div>
                              </div>
                              <hr>
                            @endforeach
                        </div>
                    </div>
                  </div>
              </div>
          </div>

        </div>

    </div>

    <!-- /.container -->

@endsection

@section('scripts')

@endsection
