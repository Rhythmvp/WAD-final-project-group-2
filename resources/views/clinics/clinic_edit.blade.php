<h1>Edit Clinic</h1>

<form action="/clinics/{{ $clinic->id }}" method="POST">
    @csrf
    @method('PUT')

    <label>Name:</label>
    <input type="text" name="name" value="{{ $clinic->name }}"><br><br>

    <label>Location:</label>
    <input type="text" name="location" value="{{ $clinic->location }}"><br><br>

    <label>Phone:</label>
    <input type="text" name="phone" value="{{ $clinic->phone }}"><br><br>

    <label>Hours:</label>
    <input type="text" name="hours" value="{{ $clinic->hours }}"><br><br>

    <button>Update Clinic</button>
</form>
