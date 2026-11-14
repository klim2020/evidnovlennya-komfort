PORT ?= 8000

.PHONY: dev help

help:
	@echo "make dev [PORT=8000]  — локальний сервер для розробки (http://localhost:$(PORT))"

dev:
	@echo "Сервер запущено: http://localhost:$(PORT)  (Ctrl+C щоб зупинити)"
	@python3 -m http.server $(PORT)
