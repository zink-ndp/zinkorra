import numpy as np 
import pandas as pd 
import timm
timm.list_models(pretrained=True)

from DeepImageSearch import Load_Data, Search_Setup

dl = Load_Data()

img_list = dl.from_folder(folder_list = ["input/chair","input/bed","input/cabinet","input/mattress","input/table","input/toilet","input/other"])

print("Total Image Count:",len(img_list))
print("Samples:")
print(img_list[:10])

# For Faster Serching we need to index Data first, After Indexing all the meta data stored on the local path
st = Search_Setup(img_list, model_name="vgg19", pretrained=True, image_count=None)

st.run_index()

# Add new images to the index
st.add_images_to_index(img_list[1001:1010])

# Get metadata
metadata = st.get_image_metadata_file()

print(metadata)

print(st.get_similar_images(image_path='test.png', number_of_images=5))

st.plot_similar_images(image_path='test.png', number_of_images=5)