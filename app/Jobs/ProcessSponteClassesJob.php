<?php

namespace App\Jobs;

use App\Http\Requests\SponteRequest;
use App\Models\ClassMember;
use App\Models\ClassSchedule;
use App\Models\SponteClasses;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessSponteClassesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $request;
    protected $classId;

    /**
     * Create a new job instance.
     * @param string $classId
     * @return void
     */
    public function __construct(string $classId)
    {
        $this->request = new SponteRequest();
        $this->classId = $classId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = $this->request->postSearch($this->classId);


        SponteClasses::create([
            'class_id' => $data['class_id'],
            'name' => $data['name'],
            'professor_id' => $data['professor_id'],
            'professor_name' => $data['professor_name'],
            'capacity' => $data['capacity'],
            'semester' => $data['semester'],
            'time' => $data['time'],
        ]);
        $membersData = $data['members'];
        foreach ($membersData as $memberData) {
            ClassMember::create([
                'class_id' => $data['class_id'],
                'student_id' => $memberData['student_id'],
                'start_date' => $memberData['start_date'],
            ]);
        }
        $scheduleData = $data['schedule'];
        foreach ($scheduleData as $schedule) {
            ClassSchedule::create([
                'class_id' => $data['class_id'],
                'schedule_date' => $schedule['schedule_date'],
                'lesson' => $schedule['lesson'],
                'phase' => $schedule['phase'],
                'professor' => $schedule['professor'],
                'situation' => $schedule['situation'],
            ]);
        }
    }
}
