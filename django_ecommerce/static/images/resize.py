from PIL import Image

image = Image.open("backpack.jpg")
image = image.resize((480, 324), Image.ANTIALIAS)
image.save(fp="newimage.jpg")