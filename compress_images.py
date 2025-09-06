import os
from PIL import Image

# Folder containing images
dir_path = os.path.dirname(os.path.abspath(__file__))

# Supported formats
formats = ['.webp', '.jpg', '.jpeg', '.png']

# Compression settings
quality = 80  # Adjust for balance between quality and size
max_width = 1200  # Resize if larger than this
max_height = 1200

for filename in os.listdir(dir_path):
    ext = os.path.splitext(filename)[1].lower()
    if ext in formats:
        file_path = os.path.join(dir_path, filename)
        try:
            with Image.open(file_path) as img:
                # Resize if needed
                if img.width > max_width or img.height > max_height:
                    img.thumbnail((max_width, max_height))
                # Save compressed
                img.save(file_path, quality=quality, optimize=True)
                print(f"Compressed: {filename}")
        except Exception as e:
            print(f"Error compressing {filename}: {e}")
print("All images processed.")
