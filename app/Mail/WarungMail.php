<?php

namespace App\Mail;

use App\Category;
use App\Topic;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class WarungMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $category_name;
    protected $pengurus_name;
    protected $pengurus_email;
    protected $topic;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($category_name, $pengurus_name, $pengurus_email, Topic $topic)
    {
        $this->category_name = $category_name;
        $this->pengurus_name = $pengurus_name;
        $this->pengurus_email = $pengurus_email;
        $this->topic = $topic;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        var_dump(
            $this->category_name,
            $this->pengurus_name,
            $this->pengurus_email,
            $this->topic
        );
        return $this->view('home.mail', ['category_name' => $this->category_name, 'pengurus_name' => $this->pengurus_name, 'pengurus_email' => $this->pengurus_email, 'topic' => $this->topic])
            ->from($this->topic['email'])
            ->subject($this->topic['subject']);
    }
}
