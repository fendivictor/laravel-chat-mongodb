<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use App\Models\User;
use Livewire\Component;

class ChatBox extends Component
{
    public array $destination;
    public mixed $currentChat;
    public mixed $users;
    public string $messageText;

    public function mount()
    {
        $user = auth()->user();
        $this->currentChat = [];
        $this->users = User::all();
        $this->destination = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ];
        $this->messageText = '';
    }

    public function render()
    {
        return view('livewire.chat-box');
    }

    public function loadCurrentChat()
    {
        $this->currentChat = Chat::query()
            ->where(function($query) {
                $query->where('sender_id', auth()->user()->id)
                    ->orWhere('sender_id', $this->destination['id']);
            })
            ->where(function($query) {
                $query->where('receiver_id', auth()->user()->id)
                    ->orWhere('receiver_id', $this->destination['id']);
            })
            ->orderByDesc('created_at')
            ->get();
    }

    public function setAsDestination(string $id, string $name, string $email): void
    {
        $this->destination = [
            'id' => $id,
            'email' => $email,
            'name' => $name,
        ];
        $this->loadCurrentChat();
    }

    public function sendMessage(): void
    {
        $user = auth()->user();
        Chat::query()
            ->create([
                'sender_id' => $user->id,
                'sender_email' => $user->email,
                'receiver_id' => $this->destination['id'],
                'receiver_email' => $this->destination['email'],
                'message' => $this->messageText,
            ]);
        
        $this->messageText = '';
    }
}
