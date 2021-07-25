<div class="page-container">

    <!-- Main Page Content -->
    <div class="page-content">


        <header>
            <div class="row">
                <div class="col-md-6">
                    <h1 class="mb-0">Messenger</h1>
                    {{-- <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 mt-3 p-0 breadcrumbs-chevron">
                            <li class="breadcrumb-item"><a href="https://exon.arsaland.com/">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="https://exon.arsaland.com/">Applications</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Chat Application</li>
                        </ol>
                    </nav> --}}
                </div>
            </div>
        </header>


        <!-- Default -->
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
                            <div class="form-group p-2 mb-0 bg-secondary">
                                <div class="input-group input-group-rounded input-group-search">
                                    <input type="search" id="myInput" class="form-control" placeholder="Search contacts...">
                                </div>
                            </div>

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
                                                <img src="../../../assets/avatars/8.jpg" class="avatar rounded-circle" alt="Avatar image">
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
                                <div class="input-group-append">
                                    <button class="btn btn-light btn-icon" type="button">
                                        <svg id="lnr-smile" viewBox="0 0 1024 1024"><path class="path1" d="M486.4 1024c-129.922 0-252.067-50.594-343.936-142.464s-142.464-214.014-142.464-343.936c0-129.923 50.595-252.067 142.464-343.936s214.013-142.464 343.936-142.464c129.922 0 252.067 50.595 343.936 142.464s142.464 214.014 142.464 343.936-50.594 252.067-142.464 343.936c-91.869 91.87-214.014 142.464-343.936 142.464zM486.4 102.4c-239.97 0-435.2 195.23-435.2 435.2s195.23 435.2 435.2 435.2 435.2-195.23 435.2-435.2-195.23-435.2-435.2-435.2z"></path><path class="path2" d="M332.8 409.6c-42.347 0-76.8-34.453-76.8-76.8s34.453-76.8 76.8-76.8 76.8 34.453 76.8 76.8-34.453 76.8-76.8 76.8zM332.8 307.2c-14.115 0-25.6 11.485-25.6 25.6s11.485 25.6 25.6 25.6 25.6-11.485 25.6-25.6-11.485-25.6-25.6-25.6z"></path><path class="path3" d="M640 409.6c-42.349 0-76.8-34.453-76.8-76.8s34.451-76.8 76.8-76.8 76.8 34.453 76.8 76.8-34.451 76.8-76.8 76.8zM640 307.2c-14.115 0-25.6 11.485-25.6 25.6s11.485 25.6 25.6 25.6 25.6-11.485 25.6-25.6-11.485-25.6-25.6-25.6z"></path><path class="path4" d="M486.4 870.4c-183.506 0-332.8-149.294-332.8-332.8 0-14.139 11.462-25.6 25.6-25.6s25.6 11.461 25.6 25.6c0 155.275 126.325 281.6 281.6 281.6s281.6-126.325 281.6-281.6c0-14.139 11.461-25.6 25.6-25.6s25.6 11.461 25.6 25.6c0 183.506-149.294 332.8-332.8 332.8z"></path></svg>
                                    </button>
                                    <button class="btn btn-light btn-icon" type="button">
                                        <svg id="lnr-camera" viewBox="0 0 1024 1024"><path class="path1" d="M486.4 768c-127.043 0-230.4-103.357-230.4-230.4s103.357-230.4 230.4-230.4c127.043 0 230.4 103.357 230.4 230.4s-103.357 230.4-230.4 230.4zM486.4 358.4c-98.811 0-179.2 80.389-179.2 179.2s80.389 179.2 179.2 179.2 179.2-80.389 179.2-179.2-80.389-179.2-179.2-179.2z"></path><path class="path2" d="M896 921.6h-819.2c-42.347 0-76.8-34.451-76.8-76.8v-512c0-42.347 34.453-76.8 76.8-76.8h76.8c21.246 0 54.278-13.682 69.302-28.706l29.992-29.992c24.914-24.915 70.272-43.702 105.506-43.702h256c35.235 0 80.594 18.789 105.506 43.702l29.992 29.99c15.024 15.026 48.056 28.707 69.302 28.707h76.8c42.349 0 76.8 34.453 76.8 76.8v512c0 42.349-34.451 76.8-76.8 76.8zM76.8 307.2c-14.115 0-25.6 11.485-25.6 25.6v512c0 14.115 11.485 25.6 25.6 25.6h819.2c14.115 0 25.6-11.485 25.6-25.6v-512c0-14.115-11.485-25.6-25.6-25.6h-76.8c-35.235 0-80.594-18.789-105.506-43.702l-29.992-29.99c-15.024-15.026-48.056-28.707-69.302-28.707h-256c-21.246 0-54.278 13.682-69.302 28.706l-29.992 29.992c-24.914 24.915-70.272 43.702-105.506 43.702h-76.8z"></path></svg>
                                    </button>
                                </div>
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
