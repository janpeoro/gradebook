@extends('components.layout')

@section('data')
<link rel="stylesheet" href="{{asset('css/grade-book/data/grade-data.css')}}">

<div class="container mt-3">
    <!-- Display success message if a student is added -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Button and GradingComponents Section -->
    <div class="d-flex justify-content-between mb-3 align-items-center">
        <!-- Add Button -->
        <button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#addStudentModal">
            <i class=""></i> Add Student
        </button>

        <!-- Grading Components -->
        <a href="{{ route('grading-components.index') }}" class="grading-components-link">
            <i class=""></i> Grading Components
        </a>
    </div>

    <!-- Horizontal Line -->
    <hr class="separator">

    <!-- Students Table -->
    <div class="table-container">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Grading System</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $student->student_id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->course }}</td>
                        <td>{{ $student->grading_system }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Add Student Modal -->
<div class="modal fade" id="addStudentModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content game-modal-content">
        <div class="modal-header game-modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New Student</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
            <form action="{{ route('data.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="student_id" class="form-label">Student ID</label>
                    <input type="text" class="form-control" id="student_id" name="student_id" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="course" class="form-label">Course</label>
                    <input type="text" class="form-control" id="course" name="course" required>
                </div>
                <div class="mb-3">
                    <label for="grading_system" class="form-label">Grading System</label>
                    <input type="text" class="form-control" id="grading_system" name="grading_system" required>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
</div>

@endsection
