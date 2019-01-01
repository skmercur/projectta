from PIL import Image
import sys
basewidth = 320
img = Image.open(sys.argv[1])
wpercent = (basewidth/float(img.size[0]))
hsize = int((float(img.size[1])*float(wpercent)))
img = img.resize((basewidth,hsize), Image.ANTIALIAS)
oldIm =  sys.argv[1]
imgName = oldIm[0:sys.argv[1].find('.')]
imgName += '_r.jpg'
img.save(imgName)
exit()