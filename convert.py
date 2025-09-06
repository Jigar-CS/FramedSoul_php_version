from PIL import Image
import os

# Directory where images are located ('.' means current directory)
input_dir = 'www.FramedSoul.com/'
output_dir = './webp_images'

# Create output directory if it doesn't exist
if not os.path.exists(output_dir):
    os.makedirs(output_dir)

# Loop through img1 to img33
for i in range(1, 34):
    input_filename = f'img{i}.webp'
    output_filename = f'img{i}.webp'

    input_path = os.path.join(input_dir, input_filename)
    output_path = os.path.join(output_dir, output_filename)

    try:
        with Image.open(input_path) as img:
            img.save(output_path, 'webp')
            print(f'Converted: {input_filename} → {output_filename}')
    except Exception as e:
        print(f'Failed to convert {input_filename}: {e}')
