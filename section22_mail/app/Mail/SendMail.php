<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $mailBody;

    /**
     * Create a new message instance.
     */
    public function __construct($mailBody)
    {
        $this->mailBody = $mailBody; // biến này sẽ được truyền vào view
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope // cấu hình tiêu đề,người gửi, vv
    {
        return new Envelope(
            subject: 'Laravel Mail Test', // tiêu đề mail
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content  // định nghĩa nội dung mail
    {
        return new Content(
            view: 'mail.demo-mail',  // nội dung là file blade này
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array  // các tệp dính kèm của mail
    {
        return [
            // Attachment::fromPath(public_path('images/laravel.png'))  // Đính kèm tệp từ đường dẫn tuyệt đối
          //Attachment::fromStorage()      //	Đính kèm tệp từ Laravel Storage (tức là thư mục storage/app/...)
          //Attachment::fromStorageDisk() //Giống fromStorage nhưng cho phép chọn disk (ví dụ s3, public, ...)
          //Attachment::fromUrl()       //Đính kèm tệp từ URL
        ];
    }
}
