<div class="page-container">

    <!-- Main Page Content -->
    <div class="page-content">


        <header>
            <div class="row">
                <div class="col-md-6">
                    <h1 class="mb-0">Messenger</h1>

                </div>
            </div>
        </header>

        <div class="panel">
            <div class="panel-body bg-secondary p-0">

                <div class="row no-gutters chat-app-1">

                    <!-- History box-->
                    <div class="col-5 col-history">
                        <div class="bg-white">

                            <div class="bg-gray p-0 bg-light">
                                <div class="panel-header history-box-header">
                                    <h3 class="panel-title">Recent</h3>
                                </div>
                            </div>
                            {{-- <div class="form-group p-2 mb-0 bg-secondary">
                                <div class="input-group input-group-rounded input-group-search">
                                    <input type="search" id="myInput" class="form-control" placeholder="Search contacts...">
                                </div>
                            </div> --}}

                            <div class="history-box" wire:poll="mountdata">
                                @foreach($users as $user)
                                @if($user->id !== auth()->id())
                                @php
                                $not_seen = App\Models\Message::where('user_id',$user->id)
                                ->where('receiver_id',auth()->id())
                                ->where('is_seen',false)
                                ->get() ?? null
                                @endphp
                                <div class="list-group rounded-0">
                                    <a wire:click="getUser({{$user->id}})" class="list-group-item">
                                        <div class="message">
                                            <div class="user-avatar">
                                                @if($user->personal_image)
                                                <img src="{{asset('storage/personal_image/'.$user->id.'/'.$user->personal_image)}}" class="avatar rounded-circle" alt="Avatar image">
                                                @else
                                                <img src="{{asset('assets/test.jpg')}}" class="avatar rounded-circle">
                                                @endif
                                                @if($user->is_online==true)
                                                {{-- "badge badge-success color-badge badge-size-1" --}}
                                                <span class="badge badge-success color-badge badge-size-1"></span>
                                                {{-- <span class="badge badge-secondary color-badge"></span> --}}
                                                @else
                                                <span class="badge badge-secondary color-badge"></span>
                                                @endif

                                            </div>
                                            <div class="message-body">
                                                <div class="message-header">
                                                    <h6 class="mb-0" id="myContact">{{$user->name}}</h6>
                                                    @if(filled($not_seen))

                                                    <div class="badge badge-success rounded">
                                                        {{$not_seen->count()}}
                                                    </div>
                                                    @endif
                                                </div>
                                                {{-- @foreach($allmessages as $mgs)
                                                @if($mgs->user_id==auth()->id())
                                                <p class="message-content">
                                                    {{$mgs->message}}
                                                </p>
                                                @endif
                                                @endforeach --}}
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Chat Box-->
                    <div class="col-7 col-chat">

                        <div class="bg-gray p-0 bg-light">
                            <div class="panel-header chat-box-header">
                                <div class="message">
                                    <div class="message-body">
                                        @if(isset($sender))
                                        <div class="">
                                            <h6 class="mb-0">{{$sender->name}}</h6>
                                            <div class="text-sm">{{$sender->last_activity}}</div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="chat-box">
                            @if(filled($allmessages))
                            @foreach($allmessages as $mgs)
                            @if($mgs->user_id==auth()->id())
                            {{-- <!-- Date Separator -->
                            <div class="chat-box-date-label mt-0">
                                <span>Tuesday</span>
                            </div> --}}
                            <!-- Sent Message -->
                            <div class="message message-sent">
                                <div class="message-body">
                                    <div class="message-content">
                                        <p class="text-sm mb-0 text-white">{{$mgs->message}}</p>
                                    </div>
                                    <p class="message-datetime">{{$mgs->created_at}}</p>
                                </div>
                            </div>
                            @else
                            <div class="message">
                                <div class="message-body">
                                    <div class="message-content">
                                        <p class="text-sm mb-0 text-black">{{$mgs->message}}</p>
                                    </div>
                                    <p class="message-datetime">{{$mgs->created_at}}</p>
                                </div>
                            </div>
                            @endif
                            @endforeach
                            @endif
                        </div>
                        <!-- Input Form -->
                        <form wire:submit.prevent="sendMessage" class="bg-light">
                            <div class="input-group input-group-merged rounded-0 border-0">
                                <div class="input-group-prepend">
                                    <button class="btn btn-light btn-icon" type="submit">
                                        <svg id="lnr-location" viewBox="0 0 1024 1024"><path class="path1" d="M435.202 1024.002c-2.205 0-4.435-0.285-6.642-0.878-11.186-3.003-18.96-13.142-18.96-24.723v-384h-384c-11.581 0-21.72-7.774-24.723-18.96-3.005-11.184 1.874-22.994 11.898-28.795l972.8-563.2c10.037-5.811 22.726-4.147 30.928 4.053 8.202 8.202 9.864 20.891 4.053 30.93l-563.2 972.8c-4.658 8.045-13.186 12.774-22.154 12.774zM120.912 563.2h314.288c14.138 0 25.6 11.461 25.6 25.6v314.288l467.346-807.234-807.234 467.346z"></path></svg>
                                    </button>
                                </div>
                                <input type="text" class="form-control rounded-0 py-4" wire:model="message" placeholder="Write a message and hit Enter...">
                            </div>
                        </form>

                    </div>

                </div><!-- / .chat-app-1 -->

            </div>
        </div><!-- / Default -->


    </div><!-- / .page-content -->
    {{-- <script>
        $("#myInput").find("#myContact")
    </script> --}}
