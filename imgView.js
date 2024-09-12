function warpImg() {
    // Define CSS for full-screen zoom viewer
    const zoomStyle = `
.zoom-container {
  display: inline-block;
  position: relative;
  cursor: zoom-in;
}

.zoom-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  background-color: rgba(0, 0, 0, 0.8);
  display: flex;
  justify-content: center;
  align-items: center;
  transform: scale(0);
  transition: transform 0.3s ease;
  z-index: 9999; /* Ensure it stays on top */
}

.zoom-overlay img {
  max-width: 90%;
  max-height: 90%;
}
`;

    const styleTag = document.createElement('style');
    styleTag.innerHTML = zoomStyle;
    document.head.appendChild(styleTag);

    // Get the width of the article container
    const article = document.querySelector('article');
    const articleWidth = article.offsetWidth;

    // Add event listeners to each image element
    document.querySelectorAll('article img').forEach(img => {
        const container = document.createElement('div');
        container.classList.add('zoom-container');

        // Set the width of zoom-container to the image's natural width
        img.addEventListener('load', () => {
            container.style.width = Math.min(articleWidth / 4, img.naturalWidth) + 'px';
        });

        const overlay = document.createElement('div');
        overlay.classList.add('zoom-overlay');
        const zoomImg = document.createElement('img');
        zoomImg.src = img.src;
        
        overlay.appendChild(zoomImg);
        container.appendChild(overlay);
        img.parentNode.insertBefore(container, img);
        container.appendChild(img);

        // Image click event to show the full-screen overlay
        img.addEventListener('click', () => {
            overlay.style.transform = 'scale(1)';
        });

        // Click event on the overlay to hide it
        overlay.addEventListener('click', () => {
            overlay.style.transform = 'scale(0)';
        });
    });
}

function resizeOversizedImages(img, articleWidth) {
    // Apply max-width to resize the image to fit the viewport
    img.style.maxWidth = '100%';
    img.style.height = 'auto';  // Maintain aspect ratio
}

function initImageResize() {
    // Get the width of the article container
    const article = document.querySelector('article');
    if (!article) return;

    const articleWidth = article.offsetWidth;

    // Loop through each image inside the article container
    document.querySelectorAll('article img').forEach(img => {
        // Check if the image is already loaded
        if (img.complete) {
            resizeOversizedImages(img, articleWidth);  // Resize if the image is already loaded
        } else {
            // Add an event listener to resize when the image is fully loaded
            img.addEventListener('load', () => {
                resizeOversizedImages(img, articleWidth);
            });
        }
    });
}
