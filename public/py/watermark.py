from PIL import Image
import sys

img = Image.open(sys.argv[1])
watermark = Image.open('watermark.png')

img.paste(watermark, (int(img.size[0]/2), int(img.size[1]/2)), watermark)
img.save(sys.argv[1])
exit()