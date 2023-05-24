<div wire:poll="loadCurrentChat">
    <div class="inbox_people">
        <div class="headind_srch">
            <div class="recent_heading">
                <h4>Recent</h4>
            </div>
            <div class="srch_bar">
                <div class="stylish-input-group">
                    <input type="text" class="search-bar" placeholder="Search">
                    <span class="input-group-addon">
                        <button type="button">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div>
        <div class="inbox_chat">
            @foreach ($users as $user)
            <div class="chat_list" wire:click="setAsDestination('{{ $user->id }}', '{{ $user->name }}', '{{ $user->email }}')">
                <div class="chat_people">
                    <div class="chat_img">
                        <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
                    </div>
                    <div class="chat_ib">
                        <h5> {{ $user->name }} </h5>
                        <p>{{ $user->email }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="mesgs">
        <div class="msg_history">
            <h5>Chat with: {{ $destination['name'] }}</h5>
            @forelse ($currentChat as $chat)
                @if ($chat->sender_id === auth()->user()->id)
                    <div class="outgoing_msg">
                        <div class="sent_msg">
                            <p>{{ $chat->message }}</p>
                            <span class="time_date">{{ $chat->created_at }}</span>
                        </div>
                    </div>
                @else
                    <div class="incoming_msg">
                        <div class="incoming_msg_img">
                            <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
                        </div>
                        <div class="received_msg">
                            <div class="received_withd_msg">
                                <p>{{ $chat->message }}</p>
                                <span class="time_date">{{ $chat->created_at }}</span>
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                <p>No message yet</p>
            @endforelse
        </div>
        <div class="type_msg">
            <div class="input_msg_write">
                <input type="text" class="form-control" wire:model='messageText' placeholder="Type a message" />
                <button class="msg_send_btn" type="button" wire:click='sendMessage'>
                    <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </div>
</div>