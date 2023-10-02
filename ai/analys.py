import tensorflow as tf

model = tf.keras.applications.InceptionV3(
  weights='imagenet',
  include_top=False,
  input_shape=(224, 224, 3)
)

# Tạo bộ chuyển đổi dữ liệu
data_generator = tf.keras.preprocessing.image.ImageDataGenerator(
  rescale=1.0/255.0,
  validation_split=0.2
)

# Tải tập dữ liệu
train_dataset = data_generator.flow_from_directory(
  directory='../images/products',
  target_size=(224, 224),
  batch_size=32,
  class_mode='categorical',
  subset='training'
)

validation_dataset = data_generator.flow_from_directory(
  directory='../images/products',
  target_size=(224, 224),
  batch_size=32,
  class_mode='categorical',
  subset='validation'
)

model.compile(
  optimizer='adam',
  loss='categorical_crossentropy',
  metrics=['accuracy']
)

model.fit(
  train_dataset,
  epochs=10,
  validation_data=validation_dataset
)

# Đánh giá mô hình trên tập dữ liệu test
loss, accuracy = model.evaluate(validation_dataset)
print(f'loss: {loss}, accuracy: {accuracy}')

