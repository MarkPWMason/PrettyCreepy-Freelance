<x-layout>
    <div id="createItemContainer">
        <form id="createListingForm" action={{route('post-item')}} method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="image[]" multiple>
            <input type="text" name="title" placeholder="title">
            <textarea name="description" placeholder="description"></textarea>
            <input type="text" name="price" placeholder="price">
            <label for="category">category</label>
            <select name="category" id=""> 
                <option value="Clothing">Clothing</option>
                <option value="Jewellery">Jewellery</option>
            </select>
            <input type="text" name="sizes" id="sizes" placeholder="xs,s,m,l,xl,xxl">

            <input type="submit" value="Create Listing">
        </form>
    </div>
</x-layout>