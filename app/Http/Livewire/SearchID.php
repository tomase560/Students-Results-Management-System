<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class SearchID extends Component
{
    public $studID;
    public $student='';
    public $courses;
    public $recommendation;
    public $sum;
    public $average;
    public $showRecommendation = false;
    public $showResults = false;
    public $print;


    public function render()
    {
        // $this->$student = Student::where('studID', $studID);
        // $this->print = $this->showResults;
        $this->sum = 0;
        $this->average = 0;
        $name  = DB::table('students')->where('studID', $this->studID)->get();
        $this->student = json_decode($name, true);

    
        $result = DB::table('marks')
        ->join('courses', function ($join) {
            $join->on('marks.courseID', '=', 'courses.courseID')->where('marks.studID', '=', $this->studID);
        })
        ->get();
        $this->courses = json_decode($result, true);

        foreach ($this->courses as $course) {
            $this->sum = $this->sum + $course['marks'];
        }

        $this->average = $this->sum/6;

        if($this->average >= 50 && $this->average <= 59)
        {
            $this->recommendation = "Pass";
        } elseif ($this->average >= 60 && $this->average <= 69) {
            $this->recommendation = "Second-Class Second Division";
        } elseif ($this->average >= 70 && $this->average <= 74) {
            $this->recommendation = "Second-Class First Division";
        } elseif ($this->average >= 75) {
            $this->recommendation = "First-Class ";
        }
        
        return view('livewire.search-i-d');
    }
}
