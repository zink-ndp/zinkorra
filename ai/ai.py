import numpy as np 
import pandas as pd 
import timm
import re
timm.list_models(pretrained=True)

from DeepImageSearch import Load_Data, Search_Setup

dl = Load_Data()

img_list = dl.from_folder(folder_list = ["input/chair","input/bed","input/cabinet","input/mattress","input/table","input/toilet","input/other"])

# For Faster Serching we need to index Data first, After Indexing all the meta data stored on the local path
st = Search_Setup(img_list, model_name="vgg19", pretrained=True, image_count=None)

st.run_index()

# Get metadata
metadata = st.get_image_metadata_file()

# print(st.get_similar_images(image_path='img_to_search.png', number_of_images=4))

# Tạo một tệp để ghi dữ liệu
with open("data.txt", "w") as f:

    # Đọc dữ liệu từ biến
    data = st.get_similar_images(image_path='img_to_search.png', number_of_images=6)

    # Chỉ lấy sau dấu "\"
    for key, value in data.items():
        match = re.search(r"(\w+)\.(.*)", value)
        print(match.group(1) + "." + match.group(2)+"\n")
        f.write(match.group(1) + "." + match.group(2)+"\n")
