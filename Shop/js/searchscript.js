const search = () => {
    const searchBox = document.getElementById("search-item").value.toUpperCase();
    const storeItems = document.getElementsByClassName('card');
    
    for (let i = 0; i < storeItems.length; i++) {
        const product = storeItems[i];
        const pname = product.getElementsByTagName("h5")[0];
        
        if (pname) {
            let textValue = pname.textContent || pname.innerHTML;
            if (textValue.toUpperCase().indexOf(searchBox) > -1) {
                product.style.display = "";
            } else {
                product.style.display = "none";
            }
        }
    }
}
