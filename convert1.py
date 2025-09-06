from PIL import Image
import os

# Image numbers that need rotation fix
images_to_fix = [1, 2, 12, 13, 17, 21, 23]

# Directories
input_dir = 'www.FramedSoul.com/'
output_dir = './webp_images_fixed'

# Create output directory if needed
if not os.path.exists(output_dir):
    os.makedirs(output_dir)

# Process specific images
for i in images_to_fix:
    input_filename = f'img{i}.webp'
    output_filename = f'img{i}.webp'

    input_path = os.path.join(input_dir, input_filename)
    output_path = os.path.join(output_dir, output_filename)

    try:
        with Image.open(input_path) as img:
            # Rotate 90 degrees counter-clockwise
            rotated = img.rotate(270, expand=True)

            # Save in WebP format
            rotated.save(output_path, 'webp')
            print(f"Fixed and converted: {input_filename} → {output_filename}")
    except Exception as e:
        print(f"Error processing {input_filename}: {e}")
