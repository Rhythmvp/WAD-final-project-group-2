<h1>Add Clinic</h1>

<form action="/clinics" method="POST">
    @csrf

    <label>Name:</label>
    <input type="text" name="name"><br><br>

    <label>Location:</label>
    <input type="text" name="location"><br><br>

    <label>Phone:</label>
    <input type="text" name="phone"><br><br>

    <label>Hours:</label>
    <input type="text" name="hours"><br><br>

    <button>Add Clinic</button>
</form>
