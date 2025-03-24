@extends('layouts.master')

@section('title', 'Calculator')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Simple Calculator</h1>

        <!-- Calculator Form -->
        <div class="card mx-auto" style="max-width: 400px;">
            <div class="card-body">
                <form id="calculatorForm">
                    <!-- First Number -->
                    <div class="mb-3">
                        <label for="number1" class="form-label">First Number</label>
                        <input type="number" class="form-control" id="number1" name="number1" step="any" required>
                    </div>

                    <!-- Second Number -->
                    <div class="mb-3">
                        <label for="number2" class="form-label">Second Number</label>
                        <input type="number" class="form-control" id="number2" name="number2" step="any" required>
                    </div>

                    <!-- Operation Buttons -->
                    <div class="d-flex justify-content-between mb-3">
                        <button type="button" class="btn btn-primary" onclick="calculate('add')">Add (+)</button>
                        <button type="button" class="btn btn-primary" onclick="calculate('subtract')">Subtract (-)</button>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <button type="button" class="btn btn-primary" onclick="calculate('multiply')">Multiply (×)</button>
                        <button type="button" class="btn btn-primary" onclick="calculate('divide')">Divide (÷)</button>
                    </div>

                    <!-- Result -->
                    <div class="mb-3">
                        <label for="result" class="form-label">Result</label>
                        <input type="text" class="form-control" id="result" readonly>
                    </div>

                    <!-- Reset Button -->
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-secondary" onclick="resetForm()">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function calculate(operation) {
            // Get the input values
            const num1 = parseFloat(document.getElementById('number1').value);
            const num2 = parseFloat(document.getElementById('number2').value);
            let result;

            // Validate inputs
            if (isNaN(num1) || isNaN(num2)) {
                alert('Please enter valid numbers.');
                return;
            }

            // Perform the operation
            switch (operation) {
                case 'add':
                    result = num1 + num2;
                    break;
                case 'subtract':
                    result = num1 - num2;
                    break;
                case 'multiply':
                    result = num1 * num2;
                    break;
                case 'divide':
                    if (num2 === 0) {
                        alert('Cannot divide by zero.');
                        return;
                    }
                    result = num1 / num2;
                    break;
                default:
                    result = 0;
            }

            // Display the result
            document.getElementById('result').value = result.toFixed(2);
        }

        function resetForm() {
            document.getElementById('calculatorForm').reset();
            document.getElementById('result').value = '';
        }
    </script>
@endsection