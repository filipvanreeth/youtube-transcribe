# Use the official PHP image with CLI support
FROM php:8.3-cli

# Install necessary dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    wget \
    ffmpeg \
    python3 \
    python3-pip \
    python3-venv \
    && rm -rf /var/lib/apt/lists/*

# Create a virtual environment
RUN python3 -m venv /opt/venv

# Install yt-dlp and Whisper inside the virtual environment
RUN /opt/venv/bin/pip install --no-cache-dir yt-dlp openai-whisper

# Ensure python, pip, yt-dlp and whisper commands are available globally
ENV PATH="/opt/venv/bin:$PATH"

# Set the working directory
WORKDIR /app

# Copy the project files into the container
COPY . /app

# Install Symfony Console dependencies
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer install

# Set the entrypoint to the PHP CLI
ENTRYPOINT ["php"]