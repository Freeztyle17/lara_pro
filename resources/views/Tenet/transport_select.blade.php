<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Выбор тарифа транспортировки</title>
    <!-- Подключение Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <h2 class="mb-4">Выбор тарифа транспортировки</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('transport.ship') }}" method="POST">
            @csrf

            <!-- Выбор слота -->
            <div class="mb-3">
                <label for="slot" class="form-label">Выберите слот для транспортировки:</label>
                <select class="form-select" id="slot" name="slot_id" required>
                    <option value="">-- Выберите слот --</option>
                    @foreach($userBookedSlots as $slotId)
                        <option value="{{ $slotId }}">
                            Слот: C-{{ $slotId->row }}-{{ $slotId->column }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Адрес назначения -->
            <div class="mb-3">
                <label for="destination" class="form-label">Адрес назначения:</label>
                <input type="text" class="form-control" id="destination" name="destination" placeholder="Введите адрес" required>
            </div>

            <!-- Выбор тарифа -->
            <div class="mb-3">
                <label class="form-label">Выберите тариф:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="rate_type" id="rateCity" value="city" required>
                    <label class="form-check-label" for="rateCity">
                        По городу - 1000 ₽
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="rate_type" id="rateRegion" value="region">
                    <label class="form-check-label" for="rateRegion">
                        По области - 5000 ₽
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="rate_type" id="rateCountry" value="country">
                    <label class="form-check-label" for="rateCountry">
                        По стране - 15000 ₽
                    </label>
                </div>
            </div>

            <!-- Кнопка отправки формы -->
            <button type="submit" class="btn btn-success w-100">Оформить транспортировку</button>
        </form>
    </div>

<!-- Подключение Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
