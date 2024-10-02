@extends('components.layout')

@section('landing')

{{-- Custom CSS --}}

<link rel="stylesheet" href="{{asset('css/grade-book/student-list/student-list.css')}}">
<link rel="stylesheet" href="{{asset('css/grade-book/student-list/left-corner.css')}}">

<header>
    <div class="header container-md text-center mt-2">
        <a href="#">Bulletin</a>
        <a href="#">Tutorials</a>
        <a href="#">Challenges</a>
        <a href="#">Players</a>
    </div>
</header>

<div class="custom-line container-sm container-md container-lg"></div>

<header>
    <div class="container first-line">
        <div class="row justify-content-between">
            <div class="col-md-4 mt-4">
                <h1 class="text">Student List</h1>
            </div>
            <div class="col-md-4 mt-4">
                <button type="button" class="export">Export</button>
            </div>
        </div>
    </div>
</header>

<div class="custom-line-2 container-sm container-md container-lg"></div>

<main>
    <div class="left-right container-fluid mt-5">
        <div class="left-container">
            <div class="mt-2">
                <img class="profile-img " src="{{ asset('img/ainz.jpg') }}" alt="Profile">
                <h3 class="mt-5">Ainz</h3>
                <p class="fw-bold">N1am</p>

                <div class="custome-line-3"></div>

                <p class="fw-bold mt-3">Jan Raphael Peoro</p>
                <p>japeoro@gbox.adnu.edu.ph</p>
                <div class="custome-line-3"></div>

                <div class="first-button">
                    <a href="" class="btns">Attendance</a>
                </div>

                <div class="second-button">
                    <a href="{{ route('data.index') }}" class="btns">Grade Components</a>
                </div>

                <div class="third-button">
                    <a href="" class="btns">Feedback</a>
                </div>

                <div class="fourth-button">
                    <a href="" class="btns">Gradebook</a>
                </div>
            </div>
        </div>
        
        <div class="container text-center right-container">
            <div class="row justify-content-center">
                {{-- Student Cards --}}
                <div class="col-5 student-col">
                    <div class="student-list">
                        <img src="{{ asset('img/ainz.jpg') }}" alt="Profile Picture" class="student-img">
                        <h4 class="student-name">Peoro, Jan Raphael</h4>
                    </div>
                </div>
        
                <div class="col-5 student-col">
                    <div class="student-list">
                        <img src="{{ asset('img/ainz.jpg') }}" alt="Profile Picture" class="student-img">
                        <h4 class="student-name">Panganiban, John Irvin </h4>
                    </div>
                </div>
        
            </div>
        </div>
        
      
    </div>
</main>

@endsection
