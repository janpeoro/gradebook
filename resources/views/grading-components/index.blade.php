<!-- resources/views/grading-components/index.blade.php -->

@extends('components.layout')

@section('gradecomponents')
<link rel="stylesheet" href="{{ asset('css/components.css')}}">


<div class="container mt-3">
        <div class="row justify-content-center">
            <!-- Class Standing Section -->
            <div class="col-lg-4">
                <a href="#" class="grading-section active">Class Standing</a>
            </div>
            <!-- Exam Breakdown Section -->
            <div class="col-lg-2">
                <a href="#" class="grading-section">Exam Breakdown</a>
            </div>
        </div>
        
         <!-- Horizontal Line -->
        <hr class="separator">

         <div id="class-standing-content" class="contents container mt-3 text-center">
            <button class="edit-button" data-bs-toggle="modal" data-bs-target="#classStandingModal">
                <img src="/img/edit.png" alt="Edit">
            </button>
            <div class="table-container d-inline-block mt-3">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Assessment Type</th>
                            <th>Assessment Percentage</th>
                            <th>{{ $class_standing ?? 'Class Standing' }}: {{ $percentage ? $percentage . '%' : '40%' }}</th> <!-- Ensure percentage symbol is appended here -->
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($components as $component)
                        @if ($component->assessment_type && $component->assessment_percentage)
                        <tr>
                            <td>{{ $component->assessment_type }}</td>
                            <td>{{ $component->assessment_percentage }}%</td>
                            <td></td> <!-- Empty cell for Class Standing -->
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                    
                
                </table>
            </div>
        </div>

    <!-- Exam Breakdown Content (Hidden for now) -->
    <div id="exam-breakdown-content" class="mt-4 d-none">
        <!-- Placeholder content for now -->
        <h2 class="text-center">Exam Breakdown</h2>
        <p class="text-center">Details about Exam Breakdown go here.</p>
    </div>
    <!-- Modal Triggered by the Edit Button -->
    <div class="modal fade" id="classStandingModal" tabindex="-1" aria-labelledby="classStandingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="classStandingModalLabel">Edit Class Standing</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('grading-components.store') }}" method="POST">
                    @csrf <!-- Prevent CSRF attacks -->
                    <!-- Modal Body -->
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="class_standing">Class Standing</label>
                                <input type="text" class="form-control" id="class_standing" name="class_standing" value="{{ $class_standing ?? 'Class Standing' }}">
                            </div>
                            <div class="col">
                                <label for="percentage">Percentage</label>
                                <input type="number" class="form-control" id="percentage" name="percentage" value="{{ $percentage ?? 40 }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="assessment_type">Assessment Type</label>
                                <input type="text" class="form-control" id="assessment_type" name="assessment_type" required>
                            </div>
                            <div class="col">
                                <label for="assessment_percentage">Assessment Percentage</label>
                                <input type="number" class="form-control" id="assessment_percentage" name="assessment_percentage" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
  </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

 <script src="{{asset('js/next.js')}}"></script>
 <script src="{{asset('js/modal.js')}}"></script>
    
@endsection