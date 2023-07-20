<x-layout>
    <div id="createItemContainer">
        <form id="createListingForm" action="" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="image[]" multiple>
            <input type="text" name="title" placeholder="title">
            <input type="text" name="price" placeholder="price">
            <label for="category">category</label>
            <select name="category" id=""> 
                <option value="Clothing">Clothing</option>
                <option value="Jewellery">Jewellery</option>
            </select>

            <input type="submit" value="Create Listing">
        </form>
    </div>
</x-layout>