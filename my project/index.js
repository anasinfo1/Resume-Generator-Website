
// display profile image into the box

		const inpFile = document.getElementById("photo");
		const previewContainer = document.getElementById("imageprofile");

	inpFile.addEventListener("change",function () {
			const file = this.files[0];
			if (file) {

				const reader = new FileReader();

				previewContainer.style.display = "block";

				reader.addEventListener("load", function(){
					previewContainer.setAttribute("src", this.result);
					previewContainer.style.overflow = "hidden";
					previewContainer.style.position = "relative";
					previewContainer.style.width = "120px";
					previewContainer.style.height = "120px";
					previewContainer.style.padding = "20px 0px";

				});

				reader.readAsDataURL(file);
			} else{
				previewContainer.style.display = null;
				previewContainer.setAttribute("src", "");
			}
		});





