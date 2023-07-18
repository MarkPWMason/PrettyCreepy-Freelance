<x-layout>
    <div id="createItemContainer">
        <form id="createListingForm" action="" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="image" name="image">
            <input type="text" name="title" placeholder="title">
            <input type="number" name="price" placeholder="price">
            <label for="category">category</label>
            <select name="category" id=""> 
                <option value="Clothing">Clothing</option>
                <option value="Jewellery">Jewellery</option>
            </select>

            <input type="submit" value="Create Listing">
        </form>
    </div>
</x-layout>