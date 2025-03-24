@extends('layouts.master')

@section('title', 'Student Transcript')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Student Transcript</h1>

        <!-- Student Information -->
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Student Information</h5>
                <p class="card-text"><strong>Name:</strong> {{ $transcript['student_name'] ?? 'N/A' }}</p>
                <p class="card-text"><strong>Student ID:</strong> {{ $transcript['student_id'] ?? 'N/A' }}</p>
            </div>
        </div>

        <!-- Transcript Table -->
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Course Code</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Credits</th>
                    <th scope="col">Grade</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($transcript['courses']) && is_array($transcript['courses']) && count($transcript['courses']) > 0)
                    @foreach ($transcript['courses'] as $course)
                        <tr>
                            <td>{{ $course['course_code'] ?? 'N/A' }}</td>
                            <td>{{ $course['course_name'] ?? 'N/A' }}</td>
                            <td>{{ $course['credits'] ?? 0 }}</td>
                            <td>{{ $course['grade'] ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" class="text-center">No courses found in the transcript.</td>
                    </tr>
                @endif
            </tbody>
            <tfoot>
                <tr class="table-success">
                    <td colspan="3" class="text-end fw-bold">GPA</td>
                    <td class="fw-bold">{{ number_format($transcript['gpa'] ?? 0, 2) }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection