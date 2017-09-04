<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $to_users;
    protected $mail;
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->to_users as $to_user){
            \Log::info('发送邮件'.$to_user);
            \Mail::raw($this->mail['content'],function($message) use($to_user){
                $message->from('13037125104@163.com','陈明');
                $message->subject($this->mail['title']);
                $message->to($to_user);
            });
        }
    }

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($to_users,$mail)
    {
        //
        $this->to_users = $to_users;
        $this->mail = $mail;
    }
}
