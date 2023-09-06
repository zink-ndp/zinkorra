import tensorflow as tf

# Tải mô hình ResNet34
model = tf.keras.applications.ResNet50(include_top=False, weights='imagenet')

# Chuẩn bị dữ liệu huấn luyện và đánh giá
train_data = tf.keras.preprocessing.image.ImageDataGenerator(
    rescale=1./255,
    rotation_range=20,
    width_shift_range=0.1,
    height_shift_range=0.1,
    horizontal_flip=True,
    vertical_flip=True
)

train_data = train_data.flow_from_directory(
    'input',
    batch_size=32,
    target_size=(224, 224)
)

val_data = tf.keras.preprocessing.image.ImageDataGenerator(
    rescale=1./255
)

val_data = val_data.flow_from_directory(
    'val',
    batch_size=32,
    target_size=(224, 224)
)

# Huấn luyện mô hình
model.compile(optimizer='adam', loss='categorical_crossentropy', metrics=['accuracy'])

history = model.fit(
    train_data,
    epochs=10,
    validation_data=val_data
)

# Đánh giá mô hình
score = model.evaluate(val_data, verbose=0)
print(f'Test loss: {score[0]} / Test accuracy: {score[1]}')