export function loadImage(url) {
  return new Promise(((resolve, reject) => {
    let image = new Image();
    image.addEventListener('load', e => resolve(image));
    image.addEventListener('error', reject);
    image.src = url;
  }));
}
