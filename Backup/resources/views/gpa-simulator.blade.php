@extends('layouts.master')

@section('title')
    GPA Simulator
@endsection

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">GPA Simulator</h1>
        <div class="card mx-auto" style="max-width: 600px;">
            <div class="card-body">
                <form id="gpaForm">
                    <div class="mb-3">
                        <label for="courseSelect" class="form-label">Select Course</label>
                        <select class="form-select" id="courseSelect">
                            <option value="">-Select a Course-</option>
                            @foreach ($courses as $course)
                                <option value="{{ json_encode($course) }}">{{ $course['code'] }} - {{ $course['title'] }} ({{ $course['credits'] }} credits)</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="gradeSelect" class="form-label">Select Grade</label>
                        <select class="form-select" id="gradeSelect">
                            <option value="">-Select a Grade-</option>
                            <option value="4.0">A (4.0)</option>
                            <option value="3.7">A- (3.7)</option>
                            <option value="3.3">B+ (3.3)</option>
                            <option value="3.0">B (3.0)</option>
                            <option value="2.7">B- (2.7)</option>
                            <option value="2.3">C+ (2.3)</option>
                            <option value="2.0">C (2.0)</option>
                            <option value="1.7">C- (1.7)</option>
                            <option value="1.0">D (1.0)</option>
                            <option value="0.0">F (0.0)</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        <button type="button" class="btn btn-primary" id="addCourseBtn">Add Course</button>
                    </div>
                </form>
                <table class="table table-striped table-bordered mb-3" id="coursesTable">
                    <thead class="table-dark">
                        <tr>
                            <th>Course Code</th>
                            <th>Course Title</th>
                            <th>Credits</th>
                            <th>Grade</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="coursesTableBody"></tbody>
                    <tfoot>
                        <tr class="table-success">
                            <td colspan="3" class="text-end fw-bold">GPA</td>
                            <td colspan="2" class="fw-bold" id="gpaResult">0.00</td>
                        </tr>
                    </tfoot>
                </table>
                <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary" id="resetBtn">Reset</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const courseSelect = document.getElementById('courseSelect');
            const gradeSelect = document.getElementById('gradeSelect');
            const addCourseBtn = document.getElementById('addCourseBtn');
            const coursesTableBody = document.getElementById('coursesTableBody');
            const gpaResult = document.getElementById('gpaResult');
            const resetBtn = document.getElementById('resetBtn');
            let selectedCourses = [];

            addCourseBtn.addEventListener('click', function () {
                const courseData = courseSelect.value;
                const grade = gradeSelect.value;

                if (!courseData || !grade) {
                    alert('Please select a course and a grade.');
                    return;
                }

                const course = JSON.parse(courseData);
                const courseId = course.code;

                if (selectedCourses.some(c => c.code === courseId)) {
                    alert('This course has already been added.');
                    return;
                }

                selectedCourses.push({
                    code: course.code,
                    title: course.title,
                    credits: course.credits,
                    grade: parseFloat(grade),
                    gradeLabel: gradeSelect.options[gradeSelect.selectedIndex].text
                });

                updateTable();
                calculateGPA();

                courseSelect.value = '';
                gradeSelect.value = '';
            });

            function removeCourse(courseId) {
                selectedCourses = selectedCourses.filter(c => c.code !== courseId);
                updateTable();
                calculateGPA();
            }

            function updateTable() {
                coursesTableBody.innerHTML = '';
                selectedCourses.forEach(course => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${course.code}</td>
                        <td>${course.title}</td>
                        <td>${course.credits}</td>
                        <td>${course.gradeLabel}</td>
                        <td><button type="button" class="btn btn-danger btn-sm" onclick="removeCourse('${course.code}')">Remove</button></td>
                    `;
                    coursesTableBody.appendChild(row);
                });
            }

            function calculateGPA() {
                if (selectedCourses.length === 0) {
                    gpaResult.textContent = '0.00';
                    return;
                }

                let totalCredits = 0;
                let totalPoints = 0;

                selectedCourses.forEach(course => {
                    totalCredits += course.credits;
                    totalPoints += course.grade * course.credits;
                });

                const gpa = totalCredits > 0 ? totalPoints / totalCredits : 0;
                gpaResult.textContent = gpa.toFixed(2);
            }

            resetBtn.addEventListener('click', function () {
                selectedCourses = [];
                updateTable();
                calculateGPA();
                courseSelect.value = '';
                gradeSelect.value = '';
            });
        });
    </script>
@endsection