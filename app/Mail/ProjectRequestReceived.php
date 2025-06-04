<?php

namespace App\Mail;

use App\Models\ProjectRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProjectRequestReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $projectRequest;

    public function __construct(ProjectRequest $projectRequest)
    {
        $this->projectRequest = $projectRequest;
    }

    public function build()
    {
        $email = $this->subject('New Project Request Received')
            ->view('emails.project_request_received');

        if ($this->projectRequest->upload_building_plans) {
            $filePath = public_path($this->projectRequest->upload_building_plans);
            if (file_exists($filePath)) {
                $email->attach($filePath);
            }
        }

        return $email;
    }


}
